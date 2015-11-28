
#include <iostream>
#include <opencv2/core/core.hpp>
#include <opencv2/imgproc/imgproc.hpp>
#include <opencv2/highgui/highgui.hpp>
#include <stdio.h>
#include <stdlib.h>
#include "opencv2/photo.hpp"

using namespace cv;
using namespace std;


int findBiggestContour(vector<vector<Point>> contoursArray){
	int largest_area = 0;
	int largest_contour_index = 0;
	for (int i = 0; i < contoursArray.size(); i++){
		double a = contourArea(contoursArray[i], false);
		if (a > largest_area){
			largest_area = a;
			largest_contour_index = i;
		}
	}
	return largest_contour_index;
}

Mat findContoursBetter(Mat src){
	RNG rng(12345);
	//convert to grayscale
	Mat gray;
	cvtColor(src, gray, CV_BGR2GRAY);
	//detect edges
	Mat imgcanny;
	Canny(gray, imgcanny, 75, 150, 3);
	//remove noise
	fastNlMeansDenoising(imgcanny, imgcanny, 10, 7, 21);
	//add blur
	GaussianBlur(imgcanny, imgcanny, Size(3, 3), 3, 3);

	vector<vector<Point> > contours;
	findContours(imgcanny, contours, CV_RETR_EXTERNAL, CV_CHAIN_APPROX_SIMPLE);
	//adding arrays for bound rect
	vector<vector<Point> > contours_poly(contours.size());
	vector<Rect> boundRect(contours.size());
	//for loop to add rectangles to all contours
	for (size_t i = 0; i < contours.size(); i++){
		approxPolyDP(Mat(contours[i]), contours_poly[i], 3, true);
		boundRect[i] = boundingRect(Mat(contours_poly[i]));
	}

	Mat drawing = Mat::zeros(src.size(), CV_8UC3);

	int largestContour = findBiggestContour(contours);




	//draw bound rectangle and contours
	for (size_t i = 0; i< contours.size(); i++){
		Scalar color = Scalar(rng.uniform(0, 255), rng.uniform(0, 255), rng.uniform(0, 255));
		drawContours(drawing, contours_poly, (int)i, color, 1, 8, vector<Vec4i>(), 0, Point());
		//rectangle(drawing, boundRect[i].tl(), boundRect[i].br(), color, 2, 8, 0); RNG rng(12345);
	}
	Scalar color = Scalar(rng.uniform(0, 255), rng.uniform(0, 255), rng.uniform(0, 255));
	rectangle(drawing, boundRect[largestContour].tl(), boundRect[largestContour].br(), color, 2, 8, 0);
	RotatedRect rRect = minAreaRect(contours[largestContour]);

	int angle = rRect.angle;
	if (angle < -45.)
		angle += 90.;

	angle -= 2;


	cout << "Angle:" << angle;

	Point2f vertices[4];
	rRect.points(vertices);
	//draw rotated rectangle
	for (int i = 0; i < 4; i++){
		line(drawing, vertices[i], vertices[(i + 1) % 4], Scalar(0, 255, 0));
	}

	//get the rotation matrix needed
	Mat rot_mat = getRotationMatrix2D(rRect.center, angle, 1);
	//rotate the image to make drawing straight
	Mat rotated;
	warpAffine(src, rotated, rot_mat, src.size(), cv::INTER_CUBIC, cv::BORDER_CONSTANT, Scalar(255, 255, 255));
	
	//crop input to bound rectangle
	Mat croppedFaceImage = rotated(boundRect[largestContour]).clone();
	
	return croppedFaceImage;
}


int main(int argc, char** argv){
	RNG rng(12345);
	Mat input = imread(argv[1], 1);
	Mat newRotated = findContoursBetter(input);
	Mat cropped = findContoursBetter(newRotated);

	namedWindow("input", 1);
	namedWindow("newRotated", 1);
	namedWindow("cropped", 1);


	imshow("input", input);
	imshow("newRotated", newRotated);
	imshow("cropped", cropped);
	imwrite("contours.png", cropped);
	
	waitKey(0);
	
}
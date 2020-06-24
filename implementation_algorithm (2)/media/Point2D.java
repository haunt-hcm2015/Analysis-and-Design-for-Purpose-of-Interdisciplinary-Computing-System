package Hutech.TH.Tuan2;

import java.util.Scanner;

/**
 *
 * @author HAU T NGUYEN
 */
public class Point2D {
    int x, y;

    public Point2D() {
    }
    
    public Point2D(int x, int y) {
        this.x = x;
        this.y = y;
    }

    public int getX() {
        return x;
    }

    public void setX(int x) {
        this.x = x;
    }

    public int getY() {
        return y;
    }

    public void setY(int y) {
        this.y = y;
    }
    public double distance(){
        return Math.sqrt(x*x + y*y);
    }
    public void nhap(){
        Scanner sc = new Scanner(System.in);
        System.out.println("Nhap vao toa do x: ");
        this.x = sc.nextInt();
        System.out.println("Nhap vao toa do y: ");
        this.y = sc.nextInt();
    }
    public void xuat(){
        System.out.println("Toa do x: " + x + "\nToa do y: " + y);
    }
    public static void main(String[] args){
        Point2D point2D = new Point2D();
        point2D.nhap();
        point2D.xuat();
    }
}

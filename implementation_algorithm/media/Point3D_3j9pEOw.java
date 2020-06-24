package Hutech.TH.Tuan2;

import java.util.Scanner;

/**
 *
 * @author HAU T NGUYEN
 */
public class Point3D {
    int x, y, z;

    public Point3D() {
    }

    public Point3D(int x, int y, int z) {
        this.x = x;
        this.y = y;
        this.z = z;
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

    public int getZ() {
        return z;
    }

    public void setZ(int z) {
        this.z = z;
    }
    public double distance(){
        return Math.sqrt(x*x + y*y + z*z);
    }
    public void nhap(){
        Scanner sc = new Scanner(System.in);
        System.out.println("Nhap vao toa do x: ");
        this.x = sc.nextInt();
        System.out.println("Nhap vao toa do y: ");
        this.y = sc.nextInt();
        System.out.println("Nhap vao toa do z: ");
        this.z = sc.nextInt();
    }
    public void xuat(){
        System.out.println("Toa do x: " + x + "\nToa do y: " + y + "\nToa do z: " + z);
    }
    public static void main(String[] args){
        Point3D point3D = new Point3D();
        point3D.nhap();
        point3D.xuat();
    }
}

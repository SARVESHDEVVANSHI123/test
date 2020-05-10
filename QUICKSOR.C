#include<stdio.h>
#include<conio.h>
void swap(int arr[],int i,int j)
{
int temp;
if(i>=0&&j>=0)
{
temp=arr[i];
arr[i]=arr[j];
arr[j]=temp;
}
}
void quickSort(int arr[],int l,int r)
{
if(l<r){
int pivot=arr[l];
int i=l,j=r;
while(i<j)
{
i+=1;
while(i<=r&&arr[i]<pivot)
i++;
while(j>=l&&arr[j]>pivot)
j-=1;
if(i<j)
swap(arr,i,j);
}
swap(arr,l,j);
quickSort(arr,l,j-1);
quickSort(arr,j+1,r);
}
}
void printArray(int arr[],int n)
{
int i=0;
for(;i<n;i++)
printf("%d,",arr[i]);
}
void main()
{
int arr[]={48,44,19,59,72,80,42,65,82,8,95,68};
int n=sizeof(arr)/sizeof(arr[0]);
quickSort(arr,0,n-1);
printf("\nAfter Sorting:\n");
printArray(arr,n);
}

#include<stdio.h>
#include<conio.h>
void mergeSort(int [],int, int);
void sortconcate(int [],int ,int,int);
void printArray(int [],int);
void main()
{
int arr[]={25,57,48,37,12,92,86,33};
int n=sizeof(arr)/sizeof(arr[0]);
printf("%d",n);
mergeSort(arr,0,n-1);
printf("After sorting:\n");
printArray(arr,n);
getch();
}
void mergeSort(int arr[],int s,int e)
{
int m;
if(s<e)
{
m=(s+e)/2;
printf("%d",m);
mergeSort(arr,s,m);
mergeSort(arr,m+1,e);
sortconcate(arr,s,m,e);
}
}
void sortconcate(int arr[],int s,int m,int e)
{
int n1=m-s+1;
int n2=e-m;
int a1[100],a2[100];
int i=0,j=0,k=s,z;
for(z=0;z<n1;z++)
a1[z]=arr[s+z];
for(z=0;z<n2;z++)
a2[z]=arr[m+1+z];
while(i<n1 && j<n2)
{
if(a1[i]<=a2[j])
{
arr[k]=a1[i];
i++;
}
else
{
arr[k]=a2[j];
j++;
}
k++;
}
for(;i<n1;i++,k++)
arr[k]=a1[i];
for(;j<n2;j++,k++)
arr[k]=a2[j];
}
void printArray(int arr[],int n)
{
int i=0;
for(;i<n;i++)
printf("%d,",arr[i]);
}
//Answer:-:After Sorting:
//12,25,33,37,48,57,86,92,
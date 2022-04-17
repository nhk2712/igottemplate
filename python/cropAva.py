import cv2 as cv
import sys

if (len(sys.argv)>1):
    print(sys.argv[1]) # 1 is the name of image

name=sys.argv[1]
path='userava'
img=cv.imread(sys.path[0]+'/../data/tmp/'+name)

(h,w,d)=img.shape
print(h,w,d)

if w>h: # For profile picture
    pos=int((w-h)/2-1)
    img=img[0:h,pos:(pos+h)] # y1->y2, x1->x2
elif h>w:
    pos=int((h-w)/2-1)
    img=img[pos:(pos+w),0:w]

print(img.shape)

cv.imwrite(sys.path[0]+'/../data/'+path+'/'+name,img)

#cv.imshow('Test',img)
#cv.waitKey(0)
#cv.destroyAllWindows()
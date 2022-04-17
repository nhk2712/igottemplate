import cv2 as cv
import sys

if (len(sys.argv)>1):
    print(sys.argv[1]) # 1 is the name of image

name=sys.argv[1]
path='thumbnail'
img=cv.imread(sys.path[0]+'/../data/tmp/'+name)

(h,w,d)=img.shape
print(h,w,d)

# For thumbnail
# Ratio: 820x434
# 820/434=newWid/newH
newH=int(w*434/820)
if h>newH:
    pos=int((h-newH)/2-1)
    img=img[pos:(pos+newH),0:w] # y1->y2, x1->x2
elif h<newH:
    newWid=int(h*820/434)
    pos=int((w-newWid)/2-1)
    img=img[0:h,pos:(pos+newWid)]

print(img.shape)

cv.imwrite(sys.path[0]+'/../data/'+path+'/'+name,img)

#cv.imshow('Test',img)
#cv.waitKey(0)
#cv.destroyAllWindows()
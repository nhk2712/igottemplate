import aspose.slides as slides
import aspose.pydrawing as drawing
import sys,os

# Load presentation
name=sys.argv[1]

pres = slides.Presentation(sys.path[0]+'/../data/slides/'+name)
target=sys.path[0]+'/../data/preview/'+name
os.mkdir(target)

desiredX = 1600
desiredY = 900
scaleX = (float)(1.0 / pres.slide_size.size.width) * desiredX
scaleY = (float)(1.0 / pres.slide_size.size.height) * desiredY

# Loop through slides
for index in range(pres.slides.length):
    # Get reference of slide
    slide = pres.slides[index]

    # Save as JPG
    slide.get_thumbnail(scaleX, scaleY).save(target+"/{i}.jpg".format(i = index), drawing.imaging.ImageFormat.jpeg)
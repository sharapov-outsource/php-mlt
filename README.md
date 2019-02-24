##### Join clips

```bash
docker run -v /Users/alex/PhpstormProjects/php-mlt/examples/source/1-dropmock10.mov:/var/www/1.mov \
-v /Users/alex/PhpstormProjects/php-mlt/examples/source/1-dropmock11.mov:/var/www/2.mov \
-v /Users/alex/PhpstormProjects/php-mlt/examples/output/_out1.mp4:/var/www/_out1.mp4 \
-t sharapov/mlt-framework "/var/www/1.mov" "/var/www/2.mov" \
-profile hdv_720_25p -progress -consumer avformat:"/var/www/_out1.mp4" \
vcodec="libx264" vb="5000k" acodec="aac" ab="128k" frequency=44100 deinterlace=1 r=25
```

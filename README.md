# Mosaic preview

This Web application displays a list of Web pages as thumbnails.

The list of Web pages is provided by a Json document and the thumbnails are generated on every refresh.

## Screenshot 

![Screenshot](http://cravesoft.com/mosaic-preview.png)

## Installation 

### Install dependencies

For Ubuntu, simply enter the following command that will install all necessary packages:

``` bash
sudo apt-get install xvfb cutycapt imagemagick
```

### Install Isotope and Mosaic as submodules:

``` bash
git submodule init && git submodule update
```

### Define a list of Web pages

Rename the `pages-sample.json` file to `pages.json`. 

Open `pages.json` in a text editor and fill in your list of Web pages (URL, title and legend).

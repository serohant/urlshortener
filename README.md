# PHP URL Short/Redirect Class

This is simple URL Short/Redirect class service

# Install

You can install with

    gh repo clone serohant/urlshortener

## Usage
to get ready

    include 'URLShortener.class.php';
    
    $datafile = file_get_contents('urls.json');
    $datafile = json_decode($datafile,true);
    $shortener = new  URLShortener($datafile);
      
Adding url

    $name = "google";// https://serohan.com/go/google
    $URL = "https://google.com"; //this make going to ../go/google redirects you to google.com

	//automaticly checks if name exist in json file if name doesn't exist return true else return false
    if($shortener->addURL($name,$URL)){
	    echo "success";
    }else{
		echo "name exist";
	}

Removing url

    $name = "google";
    if($shortener->addURL($name,$URL)){
	    echo "remove success";
    }else{
		echo "name doesn't exist";
	}

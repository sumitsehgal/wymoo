# ajax_multi_upload Plugin for CakePHP #

A full AJAX file uploader plugin for CakePHP 1.3.
Using this, you can add multiple file upload behaviour to any or all
of your models without having to modify the database or schema.

You can click on the Upload File button, or drag-and-drop files into 
it. You can upload multiple files at a time without having to click
on any button, and it shows you a nice progress notification during
uploads. You can also delete files in edit mode.

## How to Use

### Put it in the Plugin/ directory

Unzip or move the contents of this to "plugins/ajax_multi_upload" under
the app root.


This will allow the plugin to load all the files that it needs.

### Create file directory

Make sure to create the correct files upload directory if it doesn't
exist already:
<pre>
cd cake-app-root
mkdir webroot/files
chmod -R 777 webroot/files
</pre>

The default upload directory is "files" under /webroot - but this can
be changed  

You don't have to give it a 777 permission - just make sure the web 
server user can write to this directory.

### Add to controller 

Add to controllers/app_controller.php for use in all controllers, or 
in just your specific controller where you will use it as below:

```php
var $helpers = array('AjaxMultiUpload.Upload');
```

### Add to views

Let's say you had a "companies" table with a "id" primary key.

Add this to your views/companies/view.ctp:

```php
echo $this->Upload->view('Company', $company['Company']['id']);
```

and this to your views/companies/edit.ctp:

```php
echo $this->Upload->edit('Company', $this->Form->fields['Company.id']);
```

#### Dude! No database/table schema changes?

Nope. :) Just drop this plugin in the right Plugin/ directory and add 
the code to the controller and views. Make sure the "files" directory
under webroot is writable, otherwise uploads will fail.

No tables/database changes are needed since the plugin uses a directory
structure based on the model name and id to save the appropriate files
 for the model.

#### Help! I get file upload or file size error messages!

The default upload file size limit is set to a conservative 2 MB 
to make sure it works on all (including shared) hosting. To change 
this:

* Open up plugins/ajax_multi_upload/config/global_constants.php and change the
"AMU.filesizeMB" setting to whatever size in MB you like.
* Make sure to also change the upload size setting (
upload_max_filesize and post_max_size) in your PHP settings (
php.ini) and reboot the web server!

#### Change directory 

Are you stuck to the "files" directory under webroot? Nope.

Open up config/ajax_multi_upload.php under the plugins/ajax_multi_upload directory 
and change the "AMU.directory" setting. 

The directory will live under the app webroot directory - this is
as per CakePHP conventions.



## Requirements ##

* PHP version: PHP 5.2+
* CakePHP version: Cakephp 1.3 Stable




## License ##

Copyright 2010-2011, [Gempulse Infotech Pvt. Ltd.](http://www.fullestop.com)

Licensed under [The MIT License](http://www.opensource.org/licenses/mit-license.php)<br/>
Redistributions of files must retain the above copyright notice.

## Copyright ###

Copyright 2010-2011<br/>
[Gempulse Infotech Pvt. Ltd.(http://www.fullestop.com)<br/>
510, Fourth Floor, Apex Mall,<br/>
Lal Kothi, Tonk Road,<br/>
Jaipur - 302015<br/>
RAJASTHAN<br/>
INDIA<br/>
http://www.fullestop.com<br/>


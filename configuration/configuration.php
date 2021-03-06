<?php
    //Database access
    const DB_HOST = 'localhost';
    const DB_NAME = 'web4shop';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    //Authors name
    define('AUTHORS',array('Houria REHAB','Laura TOBAJAS', 'Camélia MERAOUI'));

    //Root folders
    define('CLASSES_PATH','./classes/');
    define('CONTROLLERS_PATH','./controllers/c_');
    define('MODELS_PATH','./models/m_');
    define('RESOURCES_PATH','./resources/');
    define('VIEWS_PATH','./views/v_');

    //Subfolders : 

    //Styles
    define('STYLES_PATH',RESOURCES_PATH.'styles/s_');

    //Images Products
    define('PRODUCT_IMAGES',RESOURCES_PATH.'productimages/');

    //Other images
    define('OTHER_IMAGES',RESOURCES_PATH.'otherImages/');

    //pdf
    define('PDF',RESOURCES_PATH.'fpdf/');

    //Javascript
    define('JS_PATH',RESOURCES_PATH.'js/');

?>
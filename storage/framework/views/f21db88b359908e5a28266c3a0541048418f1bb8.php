<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



   <?php

        

        use App\Setting;  

        $setting = Setting::select()->where('id',1)->get()->first();

        if(@$_SESSION['lang'] == 'vi'){
           $duoi = '';  
           @include('lang/vi.php');
        }elseif(@$_SESSION['lang'] == 'eg'){
           $duoi = '_eg'; 
           @include('lang/eg.php');
        }elseif(@$_SESSION['lang'] == 'uae'){
           $duoi = '_uae';
           @include('lang/uae.php');
        }elseif(@$_SESSION['lang'] == 'tai'){
           $duoi = '_tai';
           @include('lang/tai.php');
        }elseif(@$_SESSION['lang'] == 'ja'){
           $duoi = '_ja';
           @include('lang/ja.php');
        }else{
           $duoi = ''; 
           @include('lang/vi.php');      
        }    


    ?>

    <meta http-equiv="content-language" content="vi" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" />



    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />



    <meta name="robots" content="index, follow, noall" />



    <meta name='revisit-after' content='1 days' />



    



    <title><?php echo $__env->yieldContent('title'); ?></title>
    


    



    <meta name="author" content="<?php echo $setting['website']; ?>" />



    <meta name="copyright" content="Nguyễn Hữu Nhân [nguyennhan091@gmail.com]" />



    <meta name="keywords" content="<?php echo $__env->yieldContent('keyword'); ?>" />



    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>" />



    <meta http-equiv="content-language" content="vi" />



    <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>" />



    <meta property="og:locale" content="vi_VN"/>



    <meta property="og:url" content="<?php echo $setting['website']; ?>" />



    <meta property="og:site_name" content="<?php echo $__env->yieldContent('title'); ?>" />



    <meta property="og:type" content="website" />



    <meta property="og:image" content="<?php echo $__env->yieldContent('img_share'); ?>" />



    <meta property="og:description" content="<?php echo $__env->yieldContent('description'); ?>" />







    <meta name="googlebot" content="noall, noindex, nofollow" />



    <meta name="geo.region" content="VN" />



    <meta name="geo.position" content="10.764338, 106.69208" />



    <meta name="geo.placename" content="Hà Nội" />



    <meta name="Area" content="HoChiMinh, Saigon, Hanoi, Danang, Vietnam" />



    



    <link rel="shortcut icon" href="<?php echo asset('upload/hinhanh/'.$setting['favico']); ?>" type="image/png" />




    <!-- Font Awesome CSS -->



    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!--link css-->



    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/animate.css')); ?>"/>

    
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/font-awesome.min.css')); ?>"/>



    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/owl.carousel.min.css')); ?>"/>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/bootstrap-datepicker.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/slimselect.min.css')); ?>"/>

    

     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/jquery.fancybox.min.css')); ?>">

    


    
    


    <script type="text/javascript" src="<?php echo e(asset('public/js/jquery.min.js')); ?>"></script>
    <link href="<?php echo e(asset('public/css/toastr.min.css')); ?>" rel="stylesheet" />
    <script src="<?php echo e(asset('public/js/toastr.min.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });
    </script>
    <script type="text/javascript">
      function homeUrl(){
          return "<?php echo url('/'); ?>";
      }
    </script>  
    

    <script type="text/javascript" src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>"></script>



    <script type="text/javascript" src="<?php echo e(asset('public/js/owl.carousel.min.js')); ?>"></script>



    <script type="text/javascript" src="<?php echo e(asset('public/js/jquery.fancybox.min.js')); ?>"></script>



    <script type="text/javascript" src="<?php echo e(asset('public/js/waypoints.min.js')); ?>"></script>



    <script type="text/javascript" src="<?php echo e(asset('public/js/jquery.counterup.min.js')); ?>"></script>



    <script type="text/javascript" src="<?php echo e(asset('public/js/wow.min.js')); ?>"></script>



    <script type="text/javascript" src="<?php echo e(asset('public/js/private.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/js/slimselect.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script>

        new SlimSelect({

            select: '#multiple',

            showSearch: true

        });
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/responsive.css')); ?>"/>
</head>



<body>

     <?php if(Session::has('toastr_msg')): ?>
        <script type='text/javascript'>
            toastr["<?php echo Session::get('toastr_lvl'); ?>"]("<?php echo Session::get('toastr_msg'); ?>")
        </script>
    <?php endif; ?>

    <?php echo $__env->make('templates.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="cd-main-content"> 

    <?php echo $__env->yieldContent('content'); ?>

    </div>

    <?php echo $__env->make('templates.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!--Link js-->




    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/styles.css')); ?>"/>
</body>



</html>
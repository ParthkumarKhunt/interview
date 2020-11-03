var Customer = function(){
    var list = function(){
        var dataArr = {};
        var columnWidth = {};
        var arrList = {
            'tableID': '#customer-list',
            'ajaxURL': baseurl + "customer-ajaxaction",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSortingApply': [0],
            'noSearchApply': [0],
            'defaultSortColumn': [0],
            'defaultSortOrder': 'DESC',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);

        $("body").on("click", ".deleteCustomer", function() {
            var id = $(this).data('id');
            setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', id); 
            }, 500);
        })

        $('body').on('click', '.yes-sure', function() {
            var id = $(this).attr('data-id');
            var data = { id: id, _token: $('#_token').val() };
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "customer-ajaxaction",
                data: { 'action': 'deleteCustomer', 'data': data },
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }

    var addCustomer = function(){

        // ==================================================== Phone Number
        $('body').on("click",".addphoneno",function(){

            var html='<div class="removeDiv">'+
                    '<div class="row pull-right">'+
                    '<button type="button" class="btn btn-icon icon-left btn-danger  removePhoneno"><i class="fas fa-minus"></i>Remove Phone number</button></div>'+
                    '<br><br><div class="row ">'+
                        '<div class="col-lg-12 col-md-12 col-sm-12">'+
                        '<div class="form-group">'+
                            
                            '<input type="input" class="form-control phoneno" name="phoneno[]" placeholder="Please enter Customer Phone Number">'+
                        '</div>'+
                    '</div>'+
                    '</div>'+                    
                '</div>';
            $(".addPhonenodiv").append(html);
        });

        $('body').on("click",".removePhoneno",function(){
            $(this).closest('.removeDiv').remove();
        });
// ==================================================== Email
        $('body').on("click",".addEmail",function(){

            var html='<div class="removeEmailDiv">'+
                    '<div class="row pull-right">'+
                    '<button type="button" class="btn btn-icon icon-left btn-danger  removeEmail"><i class="fas fa-minus"></i>Remove Email</button></div>'+
                    '<br><br><div class="row ">'+
                        '<div class="col-lg-12 col-md-12 col-sm-12">'+
                        '<div class="form-group">'+
                            '<input type="input" class="form-control emailInput" name="email[]" placeholder="Please enter Customer email">'+
                        '</div>'+
                    '</div>'+
                    '</div>'+                    
                '</div>';
            $(".addEmaildiv").append(html);
        });

        $('body').on("click",".removeEmail",function(){
            $(this).closest('.removeEmailDiv').remove();
        });

// ==================================================== Image

        $('body').on("click",".addImage",function(){

            var html='<div class="removeImageDiv">'+
                    '<div class="row pull-right">'+
                    '<button type="button" class="btn btn-icon icon-left btn-danger  removeImage"><i class="fas fa-minus"></i>Remove Image</button></div>'+
                    '<br><br><div class="row ">'+
                        '<div class="col-lg-12 col-md-12 col-sm-12">'+
                        '<div class="form-group">'+
                            ' <input type="file" class="form-control image" name="image[]" placeholder="Please enter Customer image" accept="image/*"zs>'+
                        '</div>'+
                    '</div>'+
                    '</div>'+                    
                '</div>';
            $(".addImagediv").append(html);
        });

        $('body').on("click",".removeImage",function(){
            $(this).closest('.removeImageDiv').remove();
        });
// ==================================================== Form Validation

        var form = "#add-customer";
        var validateTrip = true;
        var customValid = true;
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        $(form).validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            ignore: ":hidden",
            debug: true,
            rules: {
                username: {required: true},
                name: {required: true},
                dateofbirth: {required: true},
                
            },

            highlight: function (element) { // hightlight error inputs
            
                $(element)
                        .closest('.c-input, .form-control').addClass('has-error'); // set error class to the control group
    
                $(element).parent().parent().find('.select2').addClass('has-error');
    
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                        .closest('.c-input, .form-control').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label
                        .closest('.c-input, .form-control').removeClass('has-error'); // set success class to the control group
            },
            errorPlacement: function (error, element) {
                return true;
            },


            invalidHandler: function (event, validator) {
                validateTrip = false;
                customValid = customerInfoValid();

            },
            submitHandler: function (form) {
                
                customValid = customerInfoValid();
                
                if (customValid)
                {
                    var options = {
                        resetForm: false, // reset the form after successful submit
                        success: function (output) {
                            $(".submitbtn:visible").attr("disabled","disabled");
                            $('.submitbtn:visible').text("Please Wait");
                            // $('.loader').show();
                            //   App.stopPageLoading();
                            handleAjaxResponse(output);
                        }
                    };
                    $(form).ajaxSubmit(options);
                }
            }
        });

        function customerInfoValid() {
            var customValid = true;
            $('.phoneno').each(function () {
                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                        $(this).closest('.c-input, .form-control').addClass('has-error');
                        customValid = false;
                    } else {
                        $(this).closest('.c-input, .form-control').removeClass('has-error');
                    }
                }
            });
            $('.emailInput').each(function () {
                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                        $(this).closest('.c-input, .form-control').addClass('has-error');
                        customValid = false;
                    } else {
                        $(this).closest('.c-input, .form-control').removeClass('has-error');
                    }
                }
            });
            $('.image').each(function () {
                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                        $(this).closest('.c-input, .form-control').addClass('has-error');
                        customValid = false;
                    } else {
                        $(this).closest('.c-input, .form-control').removeClass('has-error');
                    }
                }
            });
            
            return customValid;
        }
    }
    var editCustomer = function(){

        // ==================================================== Phone Number
        $("body").on("click", ".deletePhoto", function() {
            var id = $(this).data('id');
            var deletediv = $(this).attr('data-deleteDiv');
            
            setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', id); 
                $('.yes-sure:visible').attr('data-deleteDiv', deletediv); 
            }, 500);
        })

        $('body').on('click', '.yes-sure', function() {

           

            var id = $(this).attr('data-id');
            var deleteDiv = $(this).attr('data-deleteDiv');
            var data = {deleteDiv:deleteDiv, id: id, _token: $('#_token').val() };
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "customer-ajaxaction",
                data: { 'action': 'deletePhoto', 'data': data },
                success: function(data) {
                   $("#"+deleteDiv).remove();
                   $("#basicModal").modal('hide');
                }
            });
        });

        // ==================================================== Phone Number
        $('body').on("click",".addphoneno",function(){

            var html='<div class="removeDiv">'+
                    '<div class="row pull-right">'+
                    '<button type="button" class="btn btn-icon icon-left btn-danger  removePhoneno"><i class="fas fa-minus"></i>Remove Phone number</button></div>'+
                    '<br><br><div class="row ">'+
                        '<div class="col-lg-12 col-md-12 col-sm-12">'+
                        '<div class="form-group">'+
                            
                            '<input type="input" class="form-control phoneno" name="phoneno[]" placeholder="Please enter Customer Phone Number">'+
                        '</div>'+
                    '</div>'+
                    '</div>'+                    
                '</div>';
            $(".addPhonenodiv").append(html);
        });

        $('body').on("click",".removePhoneno",function(){
            $(this).closest('.removeDiv').remove();
        });
// ==================================================== Email
        $('body').on("click",".addEmail",function(){

            var html='<div class="removeEmailDiv">'+
                    '<div class="row pull-right">'+
                    '<button type="button" class="btn btn-icon icon-left btn-danger  removeEmail"><i class="fas fa-minus"></i>Remove Email</button></div>'+
                    '<br><br><div class="row ">'+
                        '<div class="col-lg-12 col-md-12 col-sm-12">'+
                        '<div class="form-group">'+
                            '<input type="input" class="form-control emailInput" name="email[]" placeholder="Please enter Customer email">'+
                        '</div>'+
                    '</div>'+
                    '</div>'+                    
                '</div>';
            $(".addEmaildiv").append(html);
        });

        $('body').on("click",".removeEmail",function(){
            $(this).closest('.removeEmailDiv').remove();
        });

// ==================================================== Image

        $('body').on("click",".addImage",function(){

            var html='<div class="removeImageDiv">'+
                    '<div class="row pull-right">'+
                    '<button type="button" class="btn btn-icon icon-left btn-danger  removeImage"><i class="fas fa-minus"></i>Remove Image</button></div>'+
                    '<br><br><div class="row ">'+
                        '<div class="col-lg-12 col-md-12 col-sm-12">'+
                        '<div class="form-group">'+
                            ' <input type="file" class="form-control image" name="image[]" placeholder="Please enter Customer image" accept="image/*"zs>'+
                        '</div>'+
                    '</div>'+
                    '</div>'+                    
                '</div>';
            $(".addImagediv").append(html);
        });

        $('body').on("click",".removeImage",function(){
            $(this).closest('.removeImageDiv').remove();
        });
// ==================================================== Form Validation

        var form = "#edit-customer";
        var validateTrip = true;
        var customValid = true;
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        $(form).validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            ignore: ":hidden",
            debug: true,
            rules: {
                username: {required: true},
                name: {required: true},
                dateofbirth: {required: true},
                
            },

            highlight: function (element) { // hightlight error inputs
            
                $(element)
                        .closest('.c-input, .form-control').addClass('has-error'); // set error class to the control group
    
                $(element).parent().parent().find('.select2').addClass('has-error');
    
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                        .closest('.c-input, .form-control').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label
                        .closest('.c-input, .form-control').removeClass('has-error'); // set success class to the control group
            },
            errorPlacement: function (error, element) {
                return true;
            },


            invalidHandler: function (event, validator) {
                validateTrip = false;
                customValid = customerInfoValid();

            },
            submitHandler: function (form) {
                
                customValid = customerInfoValid();
                
                if (customValid)
                {
                    var options = {
                        resetForm: false, // reset the form after successful submit
                        success: function (output) {
                            $(".submitbtn:visible").attr("disabled","disabled");
                            $('.submitbtn:visible').text("Please Wait");
                            // $('.loader').show();
                            //   App.stopPageLoading();
                            handleAjaxResponse(output);
                        }
                    };
                    $(form).ajaxSubmit(options);
                }
            }
        });

        function customerInfoValid() {
            var customValid = true;
            $('.phoneno').each(function () {
                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                        $(this).closest('.c-input, .form-control').addClass('has-error');
                        customValid = false;
                    } else {
                        $(this).closest('.c-input, .form-control').removeClass('has-error');
                    }
                }
            });
            $('.emailInput').each(function () {
                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                        $(this).closest('.c-input, .form-control').addClass('has-error');
                        customValid = false;
                    } else {
                        $(this).closest('.c-input, .form-control').removeClass('has-error');
                    }
                }
            });
            // $('.image').each(function () {
            //     if ($(this).is(':visible')) {
            //         if ($(this).val() == '') {
            //             $(this).closest('.c-input, .form-control').addClass('has-error');
            //             customValid = false;
            //         } else {
            //             $(this).closest('.c-input, .form-control').removeClass('has-error');
            //         }
            //     }
            // });
            
            return customValid;
        }
    }
    return {
        init: function () {
            list();
        },
        add:function(){
            addCustomer();
        },
        edit:function(){
            editCustomer();
        },
    }
}();
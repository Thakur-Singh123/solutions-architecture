//Category delete 
$(document).ready(function() {
    //Delete category record
    $('body').on('click', '.delete_category_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var category_id = $(this).data('category_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this category!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-category',  
                    data: { category_id: category_id },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Category deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });

    //Delete blog record
    $('body').on('click', '.delete_blog_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var blog_id = $(this).data('blog_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this article!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-article',  
                    data: { blog_id: blog_id },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Article deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });
    
    //Delete contact record
    $('body').on('click', '.delete_contacty_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var contact_id = $(this).data('contact_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this contact!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-contact',  
                    data: { contact_id: contact_id },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Contact deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    }); 
}); 





function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
        //   Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
        //   )
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data) {
                    if(data.code == 200) {
                        that.parent().parent().remove();
                    }
                }
            },

            ); 
              Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
                
            
        }
        })
}
$( function() {
    $(document).on( 'click', '.delete', actionDelete);
} );

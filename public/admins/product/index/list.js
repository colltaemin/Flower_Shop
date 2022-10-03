$(function() {
  $('.btn-danger').click(function(e) {
      e.preventDefault();
      let urlRequest = $(this).data('url');
      let that = $(this);
      Swal.fire({
          title: 'Bạn có chắc chắn muốn xóa không?',
          text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Có, xóa nó!'
      }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  type: "GET",
                  url: urlRequest,
                  success: function(data) {
                      if (data.code == 200) {
                          that.parent().parent().remove();
                          Swal.fire(
                              'Đã xóa!',
                              'Dữ liệu của bạn đã bị xóa.',
                              'success'
                          ).then(()=>{
                            location.reload();
                            })
                                
                      }
                  },
                  error: function() {

                  }
              });
          }
      })
  })
})
const flashsuccess = $('.flash-data-success').data('flashdata');
const flashinfo = $('.flash-data-info').data('flashdata');
const flasherror = $('.flash-data-error').data('flashdata');

if(flashsuccess)
{
    swal(
        {
            title: 'Success!',
            text: flashsuccess,
            type: 'success',
            showConfirmButton: false,
            timer: 3000
        }
    )
}

if(flashinfo)
{
    swal(
        {
            title: 'Info!',
            text: flashinfo,
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        }
    )
}

if(flasherror)
{
    swal(
        {
            title: 'Failed!',
            text: flasherror,
            type: 'error',
            showConfirmButton: false,
            timer: 3000
        }
    )
}
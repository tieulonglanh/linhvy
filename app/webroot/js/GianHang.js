
function CheckValidTuKhoaTim(objTxtTuKhoaTimKiem)
{
    var valid = true;
    if(typeof(objTxtTuKhoaTimKiem) != 'object')
    {
        objTxtTuKhoaTimKiem = document.getElementById(objTxtTuKhoaTimKiem);
    }
    
    if(objTxtTuKhoaTimKiem != null)
    {
        if(objTxtTuKhoaTimKiem.value.Trim().length < 2)
        {
            valid = false;            
            alert("Từ khóa tìm kiếm ít nhất phải có 2 ký tự");
            objTxtTuKhoaTimKiem.focus();
        }
    }
    else
    {
        valid = false;
        alert("Đối tượng TxtTuKhoaTimKiem không hợp lệ");
    }    
    return valid;
}
function pageselecotr(regType) {
    if(regType === 'teacher') {
        location.href = "student-register.php";
    } else if(regType === 'trainer') {
        location.href = "Trainer_New/register.php";
    }
}
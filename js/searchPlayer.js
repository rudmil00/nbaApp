function search() {

    var input, filter, table, tr, td1, td2, td3, td4, td5, i, txtValue1, txtValue2, txtValue3, txtValue4, txtValue5;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("playersTable");
    tr = table.getElementsByTagName("tr");


    for (i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[1];
        td2 = tr[i].getElementsByTagName("td")[2];
        td3 = tr[i].getElementsByTagName("td")[3];
        td4 = tr[i].getElementsByTagName("td")[4];
        td5 = tr[i].getElementsByTagName("td")[5];
        if (td1 || td2 || td3 || td4 || td5) {
            txtValue1 = td1.textContent || td.innerText1;
            txtValue2 = td2.textContent || td.innerText2;
            txtValue3 = td3.textContent || td.innerText3;
            txtValue4 = td4.textContent || td.innerText4;
            txtValue5 = td5.textContent || td.innerText5;

            if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 ||
                txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1 ||
                txtValue5.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
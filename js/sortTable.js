function sortTable(n) {
    console.log("usao");
    var table, rows, switching, i, x, y, shouldSwitch, sortDirection, switchcount = 0;
    table = document.getElementById("playersTable");
    switching = true;

    sortDirection = "asc";

    while (switching) {

        switching = false;
        rows = table.rows;

        for (i = 1; i < (rows.length - 1); i++) {

            shouldSwitch = false;

            x = rows[i].getElementsByTagName("TD")[n];
            console.log(x);
            y = rows[i + 1].getElementsByTagName("TD")[n];
            console.log(y);

            if (sortDirection == "asc") {
                if (parseFloat(x.innerHTML) > parseFloat(y.innerHTML)) {

                    shouldSwitch = true;
                    break;
                }
            } else if (sortDirection == "desc") {
                if (parseFloat(x.innerHTML) < parseFloat(y.innerHTML)) {

                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {

            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {

            if (switchcount == 0 && sortDirection == "asc") {
                sortDirection = "desc";
                switching = true;
            }
        }
    }
}
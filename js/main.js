$('#dodajForm').submit(function () {
    event.preventDefault();
    console.log("Dodaj team u bazu");
    const $form = $(this);
    const $input = $form.find('input, select, button, textarea');

    const serijalizacija = $form.serialize();
    console.log("Ovo je serijalizacija");
    console.log(serijalizacija);

    $input.prop('disabled', true);

    req = $.ajax({
        url: 'handler/addTeam.php',
        type: 'post',
        data: serijalizacija
    });

    req.done(function (res, textStatus, jqXHR) {
        console.log("ovo je res");
        console.log(res);
        if (res == "Success") {
            alert("Uspesno dodat tim !");
            checked.closest("tr").add();
            console.log("bla bla");
            location.reload(true);
        } else console.log("Tim nije dodat " + res);
        console.log(res);
    });

    req.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Sledeca greska se desila> ' + textStatus, errorThrown);
    });
});



$("#deleteTeam").click(function () {
    const checked = $("input[type=radio]:checked");
    console.log(checked);
    request = $.ajax({
        url: "handler/deleteTeam.php",
        type: "post",
        data: { teamID: checked.val() },
    });
    request.done(function (response, textStatus, jqXHR) {
        if (response === "Success") {
            checked.closest("tr").remove();

            alert("Obrisan je odgovarajuci tim !");

        } else {
            console.log("Tim nije upsesno obrisan " + response);
            alert("Tim nije uspesno obrisan");
        }
    });
});

$('#updatePlayer').submit(function () {
    event.preventDefault();
    console.log("Update igraca u bazu");
    const $form = $(this);
    const $input = $form.find('input, select, button, textarea');

    const serijalizacija = $form.serialize();
    console.log("Ovo je serijalizacija");
    let obj = $form.serializeArray().reduce(function (json, { name, value }) {
        json[name] = value;
        return json;
    }, {});
    console.log(obj);

    console.log(serijalizacija);

    $input.prop('disabled', true);

    request = $.ajax({
        url: "handler/updatePlayer.php",
        type: "post",
        data: serijalizacija,
        error: function (jQueryXHR, textStatus, errorMessage) {
            console.log("Something went wrong " + errorMessage);
            alert("Pokusajte ponovo nesto nije uredu!");
            location.reload(true);
        },
        success: function () {
            alert("Uspesno je azuriran igrac...!");
            history.back();
        }
    });

});



$(document).ready(function () {
    $('#addButton').click(function () {
        $('#dodajForm').show();
    });
});


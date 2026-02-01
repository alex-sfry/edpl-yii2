function datalist(inputId, datalistId, url) {
    let debounceTimer;

    $(`#${inputId}`).on('input', function () {
        const query = $(this).val();

        if (query.length < 3) return;

        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(() => {
            $.ajax({
                url: url,
                method: 'GET',
                data: { q: query },
                success(response) {
                    const $datalist = $(`#${datalistId}`);
                    $datalist.empty();
                    response.forEach(item => $datalist.append(`<option value="${item.name}">`));
                    console.log(response);
                }
            });
        }, 500); // debounce delay (ms)
    });
}

// function createMaterialInputs() {
//     $('#add-material').on('click', function () {
//         const qty = $('.material-cnt').length;
//         console.log(qty)
//         $('.material-cnt').last().clone().appendTo("#materials-controls-cnt");


//         const $label = $('.mat-label').last();
//         const $select = $('.mat-control').last();
//         const $input = $('.percentage-control').last();

//         $select.attr('id', $select.attr('id').replace(`-${qty -1}`, `-${qty}`));
//         $label.attr('for', $label.attr('for').replace(`-${qty - 1}`, `-${qty}`));
//         $input.attr('id', $input.attr('id').replace(`-${qty - 1}`, `-${qty}`));
//         $input.val('');
//     })

//     $('#remove-material').on('click', function () {
//         if ($('.material-cnt').length > 1) $('.material-cnt').last().remove();
//     })
// }

if (document.getElementById('systemName')) datalist('station-systemname', 'systemName', '/systems/search');
// if (document.getElementById('planet-material-form')) createMaterialInputs();
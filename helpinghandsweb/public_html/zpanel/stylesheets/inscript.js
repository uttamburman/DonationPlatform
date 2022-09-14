$(window).load(function() {
	
	cookExec();
	//initAutocomplete();
}
);

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgshow')
                    .attr('src', e.target.result)
                    .width(800)
                    .height(360);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
	

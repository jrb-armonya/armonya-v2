$(window).on('load', function () {
    
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var modalTitle = $("#userModalLabel");
    var select = "";
    

    // Listen to open a modal user
    $(".open").click(function (e) {
        e.preventDefault();
        //Get the id
        id = $(this).attr("data-id");
        
        //Get the user with ajax call to configuration/user @getUser with post
        $.ajax({
            url: hostIdentifier() + '/configuration/users/get',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                //Put   the data in a modal "user-modal"
                user = data[0];
                putInModal(user, "userForm", ["name", "email", "role", "fictif"]);
            },
            
        });
        
    });

    //On Submit Button
    $(".submit-create").click(function(){
        var frm = $('#user-form');
        frm.submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                dataType: 'JSON',
                beforeSend: function() {
                    $("body").addClass("loading");
                },
                success: function (data) {
                    $('#wait').hide();
                    // location.reload();
                    console.log('AAA');
                },
                error: function (data) {
                    alert(data);
                }
            });
        });
    });

    // When press on delete btn
    $(".delete-btn").click(function(e){
        e.preventDefault();
        let id = $(this).attr("data-id");
        $.ajax({
            url: hostIdentifier() + '/configuration/users/get',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                $("#name-user-to-delete").empty();
                //Put   the data in a modal "user-modal"
                user = data[0];
                $("#name-user-to-delete").append(user.id + " - " + user.name)
                $("#UserModalDeleteLabel").empty()
                $("#UserModalDeleteLabel").append(user.id)
            }
        });
    })

    // When confirm delete
    $("#delete").click(function(e){
        e.preventDefault();
        id = $("#UserModalDeleteLabel").html();
        $.ajax({
            url: hostIdentifier() + '/configuration/users/delete',
            type: 'POST',
            data: {
                _token : CSRF_TOKEN,
                id : id
            },
            dataType: 'JSON',
            beforeSend: function() {
                $("body").addClass("loading");
            },
            success: function (data) {
                location.reload();
            }
        });
    })

    // RefreshModal Update
    function refreshModal(modal) {
        modal.empty();
        modalTitle.empty();
        modalTitle.append(user.name);
    }

    // Print Roles in Select Option
    function printRoles() {
        $.ajax({
            url: hostIdentifier() + '/configuration/roles',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN
            },
            datatype: 'JSON',
            success: function (roles) {
                roles.forEach(function (role) {
                    if (user.role.name != role.name)
                        select.append('<option value="' + role.id + '">' + role.name + '</option>');
                });
            }
        });
    }
    
    // Put the Modal
    function putInModal(user, modalId, display = []) {
        let modal = $("#" + modalId);
        refreshModal(modal);

        $.each(user, function (index, element) {
            if (jQuery.inArray(index, display) !== -1) {
                if (element == null)
                    element = "";
                if (index != "role") {
                    if(index == "fictif")
                    {

                        modal.append(
                            '<div class="form-group row">' +
                            '<label for="' + index + '" class="col-md-4 col-form-label text-md-right">' + index + '</label>' +
                            '<div class="col-md-6">' +
                            '<input id="' + index + '" type="text" class="form-control" name="' + index + '" value="' + element + '">' +
                            '</div>' +
                            '</div>'
                        );
                    }
                    else {
                        modal.append(
                            '<div class="form-group row">' +
                            '<label for="' + index + '" class="col-md-4 col-form-label text-md-right">' + index + '</label>' +
                            '<div class="col-md-6">' +
                            '<input id="' + index + '" type="text" class="form-control" name="' + index + '" value="' + element + '" required>' +
                            '</div>' +
                            '</div>'
                        );
                    }
                    
                }
                if (index == "role") {
                    modal.append(
                        '<div class="form-group row">' +
                            '<label for="role" class="col-md-4 col-form-label text-md-right">Role</label>' +
                            '<div class="col-md-6">' +
                                '<select class="form-control" id="role" name="role_id" required>' +
                                    '<option value="' + user.role.id + '" selected>' + user.role.name + '</option>' +
                                '</select>' +
                            '</div>' +
                        '</div>'
                    )
                    select = $("#role");
                }
            }
        });
        
        if (modalId == "userForm") {
            modal.append(
                '<div class="form-group row">' +
                '<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>' +
                '<div class="col-md-6">' +
                '<input id="password" type="password" class="form-control" name="password">' +
                ' </div>' +
                '</div>'
            )
            modal.append(
                '<div class="form-group row">' +
                '<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>' +
                '<div class="col-md-6">' +
                '<input id="password-confirm" type="password" class="form-control" name="password_confirmation">' +
                ' </div>' +
                '</div>'
            )
        }

        modal.append(
            '<input id="id" type="hidden" class="form-control" name="id" value="' + user.id + '">'
        );

        printRoles();
    }
    
});
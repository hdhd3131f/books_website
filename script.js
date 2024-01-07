$(document).ready(function() {
    // Load user list on page load
    loadUserList();

    // Submit form using AJAX
    $('#userForm').submit(function(event) {
        event.preventDefault();
        addUser();
    });

    // Function to load user list
    function loadUserList() {
        $.ajax({
            url: 'Showusers.php',
            type: 'GET',
            success: function(data) {
                $('#userList').html(data);
            }
        });
    }

    // Function to add a user
    function addUser() {
        $.ajax({
            url: 'Adduser.php',
            type: 'POST',
            data: $('#userForm').serialize(),
            success: function() {
                loadUserList();
                
            }
        });
    }
            // Function to delete a user
        function deleteUser(userId) {
            $.ajax({
                url: 'Delete-user.php', // Replace with your PHP script to delete user
                method: 'POST',
                data: { id: userId },
                success: function() {
                    loadUserList(); // Refresh the table after deletion
                }
            });
        }

        // Function to update a user
        function updateUser(userId, newUsername, newEmail) {
            $.ajax({
                url: 'Update-user.php', // Replace with your PHP script to update user
                method: 'POST',
                data: { id: userId, username: newUsername, email: newEmail },
                success: function() {
                    loadUserList(); // Refresh the table after update
                }
            });
        }

        // Event listener for delete button
        $(document).on('click', '.delete-btn', function() {
            var userId = $(this).data('id');
            deleteUser(userId);
        });

        // Event listener for update button
        $(document).on('click', '.update-btn', function() {
            var userId = $(this).data('id');
            var newUsername = prompt('Enter new username:');
            var newEmail = prompt('Enter new email:');
            updateUser(userId, newUsername, newEmail);
        });
   

});
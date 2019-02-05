function deleteUser(id) {
    if (confirm("Are you sure in your choice??")) {
        $.ajax({
            url: "/deleteUser/" + id,
            method: "DELETE",
            success: function (response) {
                console.log(response);
                if (response == 'success') {
                    alert("User has been deleted successfully!");

                }
            }

        })
    }
}

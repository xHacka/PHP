
document.querySelectorAll('[data-form]').forEach(formElement => {
    formElement.addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        console.log(formData);

        fetch(this.action + (formData.has("post_id") ? `/${formData.get("post_id")}` : ""), {
            method: this.method,
            body: formData
        }).then(response => {
            if (response.ok) {
                location.reload();
            } else {
                alert("Post Doesnt Exits");
            }
        }).catch(error => {
            console.log(`Error: ${error}`)
        });
    });
});

function deleteAllHandler() {
    fetch("/api/posts/purge", { method: "DELETE" }).then(response => location.reload())
}
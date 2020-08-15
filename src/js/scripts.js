function updateModal(title, dates, content, id, completed ) {
    document.getElementById("title").textContent = title;
    document.getElementById("dates").textContent = dates;
    document.getElementById("content").textContent = content;
    document.getElementById("btnDelete").href = "./src/controller/task/delete.php?id=" + id;
    document.getElementById("btnCompleted").href = "./src/controller/task/complete.php?id=" + id;
    document.getElementById("btnCompleted").style.visibility = "visible";
    document.getElementById("btnEdit").href = "./src/view/task/edit.php?id=" + id;

    if (completed == 1) {
        document.getElementById("btnCompleted").style.visibility = "hidden";
        document.getElementById("checkIcon").style.visibility = "hidden";
    }
}

function updateDeleteDialog( id, title ){
    document.getElementById("btnDelete").href = "../../controller/category/delete.php?id=" + id;
    document.getElementById("title").textContent = title;
}

function updateEditDialog( id, title ){
    document.getElementById("oldName").textContent = title;
    document.getElementById("name").value = title;
    document.getElementById("id").value = id;

}
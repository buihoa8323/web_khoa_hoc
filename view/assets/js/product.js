
function toggleContent(courseId) {
    var videoContainer = document.getElementById('video-' + courseId);
    var descriptionContainer = document.getElementById('description-' + courseId);

    if (videoContainer.style.display === 'none' && descriptionContainer.style.display === 'none') {
        videoContainer.style.display = 'block';
        descriptionContainer.style.display = 'block';
    } else {
        videoContainer.style.display = 'none';
        descriptionContainer.style.display = 'none';
    }
}

document.getElementById('update-profile-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const firstName = document.getElementById('first-name').value;
    const lastName = document.getElementById('last-name').value;
    const email = document.getElementById('email').value;
    const subjects = document.getElementById('subjects').value;

    // Update the bio with new data
    const bioParagraph = document.getElementById('bio-paragraph');
    const currentBio = bioParagraph.innerHTML.split(', ');
    if (firstName) currentBio[0] = firstName;
    if (lastName) currentBio[1] = lastName;
    if (email) currentBio[2] = email;
    if (subjects) currentBio[3] = subjects;

    bioParagraph.innerHTML = currentBio.join(', ');

    // pop up
    alert('Profile updated successfully!');
});

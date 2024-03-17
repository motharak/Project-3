                        <!-- End of main content -->
                        </div>
                </main>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var alertElement = document.querySelector('.alert');

        setTimeout(function () {
            alertElement.classList.add('fade-out');
            setTimeout(function () {
                alertElement.remove();
            }, 800); 
        }, 4000);
    });
    </script>
    <script>
    // Hide the alert after 5 seconds
    setTimeout(function() {
        var alertElement = document.getElementById('alert');
        if (alertElement) {
            alertElement.style.opacity = 0;
            setTimeout(function() {
                alertElement.style.display = 'none';
            }, 300); // 300 milliseconds for fade-out transition
        }
    }, 5000); // 5000 milliseconds = 5 seconds
</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!-- Initialize Summernote -->
    <script>
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    </script>
</body>

</html>

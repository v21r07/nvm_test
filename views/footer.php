<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top container">
	<div class="col-md-4 d-flex align-items-center">
		<span class="mb-3 mb-md-0 text-muted">©<span id="currentYear" style="font-weight: bold;"></span> par Carthage
			Consulting</span>
	</div>
	<ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
		<li class="ms-3"><a href="BANKAI" aria-label="BANKAI INSTAGRAM"><span class="text-muted bi bi-instagram"></span></a>
		</li>
		<li class="ms-3"><a href="BANKAI" aria-label="BANKAI INSTAGRAM"><span class="text-muted bi bi-linkedin"></span></a>
		</li>
	</ul>
</footer>
<script>
document.addEventListener("DOMContentLoaded", () => {
	const observer = new IntersectionObserver(
		(entries, observer) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					entry.target.classList.remove('hidden');


					const animationClasses = Array.from(entry.target.classList)
						.filter(cls => cls.startsWith('animate__'));
					animationClasses.forEach(cls => entry.target.classList.add(cls));


					observer.unobserve(entry.target);
				}
			});
		}, {
			threshold: 0.1,
		}
	);

	const targets = document.querySelectorAll('.hidden');
	targets.forEach(target => observer.observe(target));
});
</script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
// Initialize AOS
AOS.init();
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
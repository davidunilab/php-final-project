@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <h1 class="text-center">საიტის შესახებ</h1>
        <p>საიტი შექმნილია ილიაუნის სტუდენტებისთვის, რათა მათ შეძლონ შეაფასონ ლექტორები და ნახონ სხვა სტუდენტების მიერ დატოვებული შეფასების ნახვა.
        </p>
        <p>სტუდენტს ეძლევა საშუალება დარეგისტრირდეს, და დატოვოს თავისი შეფასება ლექტორთან დაკავშირებით კონკრეტული პარამეტრების მიხედვით ქულების დაწერის საშუალებით. ალტერნატიულად მას შეუძლია კომენტარებში დატოვოს შეფასება სიტყვიერად, რომელიც არ არის მოცემული პარამეტრების ჩამონათვალში, რაც შეიძლება იქნას გათვალისწინებული და ჩასმული ძირითად პარამეტრებში. </p>


    </div>


    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://source.unsplash.com/random/2000x700?student&sig=1"
                     alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Something meaningful</h5>
                    <p>More description of meaningful thing</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/random/2000x700?student&sig=20"
                     alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Something meaningful</h5>
                    <p>More description of meaningful thing</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/random/2000x700?student&sig=35"
                     alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Something meaningful</h5>
                    <p>More description of meaningful thing</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <div class="container mt-5">
        <h1 class="text-center mb-5"> საიტის ინფორმაცია ემყარება ილიაუნის <a target="_blank" href="https://iliauni.edu.ge/ge/">ოფიციალურ საიტს</a> </h1>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ფაკულტეტების ჩამონათვალი</h5>
                        <h6 class="card-subtitle mb-2 text-muted">(აკადემიური პერსონალი)</h6>
                        <p class="card-text">ილიაუნიში არსებობს 4 ფაკულტეტი, რომელიც შემდგომში იშლება პროგრამებად.</p>
                        <a target="_blank" href="https://faculty.iliauni.edu.ge/" class="card-link">გადასვლა</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">საბაკალავრო პროგრამები</h5>
                        <h6 class="card-subtitle mb-2 text-muted">ჩამონათვალი</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a target="_blank" href="https://iliauni.edu.ge/ge/iliauni/programs/sabakalavro-programebi" class="card-link">გადასვლა</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">დამატებითი სპეციალობა</h5>
                        <h6 class="card-subtitle mb-2 text-muted">(მაინორი)</h6>
                        <p class="card-text">ილიაუნიში ძირითად (major) სპეციალობასთან ერთად, გთავაზობთ შესაძლებლობას აირჩიოთ დამატებითი (minor) სპეციალობა.</p>
                        <a target="_blank" href="https://iliauni.edu.ge/ge/iliauni/programs/sabakalavro-programebi/mainori?fbclid=IwAR3hRmxVQODQmrGf_kP5AEyClu4-f_y0Q8Okdvyti69h2eS75I_meWQFUwA" class="card-link">გადასვლა</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

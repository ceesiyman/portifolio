@extends('views.home')

@section('content')
<section class="project-details py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img src="{{ asset('storage/' . $project->image) }}" class="project-img" alt="{{ $project->title }}">
            </div>
            <div class="col-md-4">
                <h2 class="project-title">{{ $project->title }}</h2>
                <p class="project-desc">{{ $project->description }}</p>
                <h5 class="tech-title">Tech Stack:</h5>
                <ul class="tech-list">
                    @foreach($project->tech_stack as $tech)
                        <li>{{ $tech }}</li>
                    @endforeach
                </ul>
                <div class="project-links">
                    <a href="{{ $project->github_link }}" class="btn btn-primary" target="_blank">GitHub</a>
                    <a href="{{ $project->live_link }}" class="btn btn-success" target="_blank">Live Demo</a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.project-details {
    background: #1a1a1a;
    color: #fff;
}

.project-img {
    width: 100%;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
}

.project-title {
    font-size: 2rem;
    font-weight: bold;
    color: #FFD700;
    margin-top: 20px;
}

.project-desc {
    font-size: 1.1rem;
    line-height: 1.6;
}

.tech-title {
    font-size: 1.3rem;
    margin-top: 20px;
    color: #FFA500;
}

.tech-list {
    list-style: none;
    padding: 0;
}

.tech-list li {
    background: #333;
    display: inline-block;
    padding: 5px 10px;
    border-radius: 5px;
    margin-right: 5px;
}

.project-links .btn {
    margin-top: 15px;
}
</style>
@endsection

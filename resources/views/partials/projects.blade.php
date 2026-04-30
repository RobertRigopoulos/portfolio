<section class="block reveal" id="projects">
    <div class="block-grid">
        <div class="block-num">04<span> /</span> Work</div>
        <div>
            <h2>Things I've built.</h2>

            {{-- @forelse loops the collection; if it's empty, runs the @empty branch. --}}
            @forelse ($projects as $project)
                <div class="project">
                    <div>
                        @if ($project->subtitle)
                            <div class="project-num">{{ $project->subtitle }}</div>
                        @endif
                        <h3>{{ $project->title }}</h3>
                        <div class="stack">{{ $project->stack }}</div>
                        <p>{{ $project->description }}</p>
                        <div class="project-links">
                            @if ($project->primary_link_url)
                                <a href="{{ $project->primary_link_url }}" target="_blank" rel="noopener">{{ $project->primary_link_label ?? 'View' }} ↗</a>
                            @endif
                            @if ($project->secondary_link_url)
                                <a href="{{ $project->secondary_link_url }}" target="_blank" rel="noopener">{{ $project->secondary_link_label ?? 'More' }} ↗</a>
                            @endif
                        </div>
                    </div>
                    @if ($project->image_url)
                        <a class="project-thumb" href="{{ $project->primary_link_url ?? '#' }}" target="_blank" rel="noopener" aria-label="View {{ $project->title }}">
                            <img src="{{ $project->image_url }}" alt="{{ $project->title }} screenshot" loading="lazy">
                        </a>
                    @endif
                </div>
            @empty
                <p>No projects to display yet.</p>
            @endforelse
        </div>
    </div>
</section>

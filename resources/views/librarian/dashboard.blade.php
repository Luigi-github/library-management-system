@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Librarian Dashboard</h2>

        <div class="card">
            <div class="card-body">
                <p>Total Books: {{ $totalBooks }}</p>
                <p>Total Borrowed Books: {{ $totalBorrowedBooks }}</p>
                <p>Books Due Today: {{ $booksDueToday }}</p>

                <h4>Members with Overdue Books:</h4>
                <ul>
                    @foreach($membersWithOverdueBooks as $member)
                        <li>{{ $member->name }} ({{ $member->overdueBooksCount }} overdue books)</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

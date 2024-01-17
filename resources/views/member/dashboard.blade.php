@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Member Dashboard</h2>

        <div class="card">
            <div class="card-body">
                <h4>Your Borrowed Books:</h4>
                @if($userBorrowings->isEmpty())
                    <p>You currently have no borrowed books.</p>
                @else
                    <ul>
                        @foreach($userBorrowings as $borrowing)
                            <li>{{ $borrowing->book->title }} Due: {{ \Carbon\Carbon::parse($borrowing->due_at)->format('Y-m-d') }}
                            </li>
                        @endforeach
                    </ul>
                @endif
                @if($overdueBooks->isNotEmpty())
                    <h4>Your Overdue Books:</h4>
                    <ul>
                        @foreach($overdueBooks as $book)
                            <li>{{ $book->title }} Due: {{ \Carbon\Carbon::parse($borrowing->due_at)->format('Y-m-d') }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection


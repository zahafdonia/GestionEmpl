@extends('admin.dashboard')

@section('content')
<div class="container mt-4">
    <h2>Liste des Employés</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Ville</th>
                <th>Poste</th>
                <th>Salaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
                <tr>
                    <td>{{ $employee->employeeId }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->lastname }}</td>
                    <td>{{ $employee->city }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>
                        <a href="{{ route('admin.gereEmpl.edit', $employee->employeeId) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('admin.gereEmpl.destroy', $employee->employeeId) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Aucun employé trouvé</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Detalle de Consulta')
@section('page_title', 'Consulta #' . $message->id)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.messages.index') }}">Consultas</a></li>
    <li class="breadcrumb-item active">#{{ $message->id }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary card-outline shadow-sm">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-envelope-open-text text-primary mr-1"></i> Asunto: {{ $message->subject }}
                </h3>
                <div class="card-tools">
                    <span class="text-muted text-sm">{{ $message->created_at->format('d/m/Y - h:i A') }}</span>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mailbox-read-info border-bottom pb-3 mb-4">
                    <h5 class="font-weight-bold text-dark mb-1">{{ $message->name }}</h5>
                    <div class="text-muted text-sm">
                        De: <a href="mailto:{{ $message->email }}" class="text-primary font-weight-bold">{{ $message->email }}</a>
                        <span class="mailbox-read-time float-right text-muted">{{ $message->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <!-- /.mailbox-read-info -->

                <div class="mailbox-read-message p-3 bg-light rounded border text-dark" style="min-height: 140px; font-size: 0.95rem; line-height: 1.6;">
                    {!! nl2br(e($message->message)) !!}
                </div>
                <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->

            <div class="card-footer bg-white d-flex justify-content-between align-items-center py-2">
                <a href="{{ route('admin.messages.index') }}" class="btn btn-default btn-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Volver a la lista
                </a>
                <div>
                    <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}&body={{ urlencode('Estimado(a) ' . $message->name . ",\n\nEn respuesta a su solicitud de consulta en DIMO Law Firm:\n\n") }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-reply mr-1"></i> Responder por Correo
                    </a>
                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('¿Eliminar definitivamente este mensaje?');" class="d-inline ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-trash-alt mr-1"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>

    <!-- Status Change Sidebar Card -->
    <div class="col-md-4">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-tasks mr-1 text-primary"></i> Gestión de Estado
                </h3>
            </div>
            <div class="card-body">
                <p class="text-xs text-muted mb-2">
                    Actualice el estado del caso o seguimiento para mantener al equipo informado.
                </p>

                <form action="{{ route('admin.messages.status', $message->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group mb-2">
                        <label for="status" class="font-weight-bold">Estado Actual:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ $message->status === 'pending' ? 'selected' : '' }}>⏳ Pendiente de contacto</option>
                            <option value="contacted" {{ $message->status === 'contacted' ? 'selected' : '' }}>📞 En contacto / Gestionado</option>
                            <option value="resolved" {{ $message->status === 'resolved' ? 'selected' : '' }}>✅ Caso Resuelto / Cerrado</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm btn-block font-weight-bold">
                        <i class="fas fa-save mr-1"></i> Guardar Estado
                    </button>
                </form>

                <hr>

                <div class="text-muted text-xs">
                    <strong>Fecha de recepción:</strong><br>
                    {{ $message->created_at->isoFormat('LLLL') ?? $message->created_at }}<br><br>
                    <strong>Última actualización:</strong><br>
                    {{ $message->updated_at->isoFormat('LLLL') ?? $message->updated_at }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<table id="data_table" class=" table table-bordered table-striped table-hover datatable datatable-Rank">
    <thead>
        <tr>
            {{-- <th class="nosort" width="10">

            </th> --}}
            <th>
                {{ trans('cruds.rank.fields.name') }}
            </th>
            <th>
                {{ trans('cruds.rank.fields.description') }}
            </th>
            <th>
                {{ trans('cruds.rank.fields.code') }}
            </th>
            <th style="text-align:center">
                {{ trans('cruds.rank.fields.credit_hours') }}  ( {{ trans('cruds.rank.fields.hours') }} )
            </th>
            <th class="nosort text-center">{{ trans('cruds.rank.fields.actions') }}</th>
            {{-- <th class="nosort">&nbsp;</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($ranks as $key => $rank)
            <tr data-entry-id="{{ $rank->id }}">
                {{-- <td>

                </td> --}}

                <td>
                    {{ $rank->name ?? '' }}
                </td>

                <td>
                    {{ $rank->description ?? '' }}
                </td>

                <td>
                    {{ $rank->code ?? '' }}
                </td>
                <td style="text-align:center">
                    {{ $rank->credit_hours ?? '' }}
                </td>
                <td>

                    <div class="table-actions text-center">
                        @can('rank_show')
                            <a href="{{ route('admin.ranks.show', ['rank' => $rank]) }}" data-toggle="tooltip" title="Show">
                                <i class="ik ik-eye f-16 mr-15 text-blue"></i>
                            </a>
                        @endcan
                        @can('rank_edit')
                            <a href="{{ route('admin.ranks.edit', ['rank' => $rank]) }}" data-toggle="tooltip" title="Edit">
                                <i class="ik ik-edit-2 f-16 mr-15 text-green"></i>
                            </a>
                        @endcan
                        {{-- @can('rank_delete')
                            <form action="{{ route('admin.ranks.destroy', $rank->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                        @endcan --}}
                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>


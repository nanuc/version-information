<div>
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Commit
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Author
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($commits as $commit)
                    <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" nowrap>
                            <a href="https://github.com/{{ $repository }}/commit/{{ $commit['sha'] }}" target="_blank" class="underline hover:text-gray-500 cursor-pointer">{{ substr($commit['sha'], 0, 7) }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $commit['commit']['message'] }}

                            @foreach($projects as $project)
                                @foreach($project['deployments'] as $deployment)
                                    @if($commit['sha'] == $deployment['commit_hash'])
                                        <span class="ml-2 inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-{{ $project['color'] }}-100 text-{{ $project['color'] }}-800 mb-1">
                                            {{ $project['data']['name'] }}: {{ datetime('medium', $deployment['updated_at']) }}: {{ strtoupper($deployment['status']) }}
                                        </span>
                                    @endif
                                @endforeach
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" nowrap>
                            {{ $commit['commit']['author']['name'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" nowrap>
                            {!! datetime("medium", $commit['commit']['author']['date']) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
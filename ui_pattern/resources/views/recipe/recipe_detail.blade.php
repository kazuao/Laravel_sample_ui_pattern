<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           レシピ詳細
       </h2>
   </x-slot>
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
				@if (session('status'))
				<div class="success mt-5 px-4 text-green-900">
					{{ session('status') }}
				</div>
				@endif
				@if (session('error'))
				<div class="error mt-5 px-4 text-red-900">
					{{ session('error') }}
				</div>
				@endif
				<!-- ページ固有要素 -->
				<div class="mt-5 px-4 py-5">
					<table class="w-full border shadow my-6">
						<tbody>
							<tr>
								<th class="px-3 py-3 text-center border">ID</th>
								<td class="px-3 py-3 border">{{ $recipe->id }}</td>
							</tr>
							<tr>
							<th class="px-3 py-3 text-center border">レシピ名</th>
								<td class="px-3 py-3 border">{{ $recipe->name }}</td>
							</tr>
							<tr>
							<th class="px-3 py-3 text-center border">作成日</th>
								<td class="px-3 py-3 border">{{ $recipe->created_at->format("Y-m-d H:i:s") }}</td>
							</tr>
							<tr>
								<th class="px-3 py-3 text-center border">更新日</th>
								<td class="px-3 py-3 border">{{ $recipe->updated_at->format("Y-m-d H:i:s") }}</td>
							</tr>
							<tr>
								<th class="px-3 py-3 text-center border">&nbsp;</th>
								<td class="px-3 py-3 border">
									<a href="{{ route('recipe_edit', ['id' => $recipe->id]) }}"
										class="bg-blue-500 text-white font-bold py-2 px-4 rounded">編集</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- /ページ固有要素 ここまで -->
			</div>
		</div>
	</div>
</x-app-layout>

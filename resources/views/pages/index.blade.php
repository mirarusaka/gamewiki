@extends('layouts.app')

@section('title', '作品一覧')

@section('content')
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    <!-- ページ一覧でございますよ～ -->
    <div class="row">
        <div class="mb-3">
                <h1>記事一覧</h1>
                @if($data == 0)
                    ※記事が存在しません。
                @else
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th class="align-middle">ゲーム名</th>
                            <th class="align-middle">タイトル画面</th>
                            <th class="align-middle">いいね数</th>
                            <th class="align-middle">作者名</th>
                            <th class="align-middle">プラットフォーム</th>
                            <th class="align-middle">ジャンル</th>
                        </tr>                
                    </thead>
                    @foreach ($pages as $page)
                    <tbody>
                        <tr>
                            <td class="align-middle" style="width: 200px"><a href="{{ $page->url }}">{{ $page->title }}</a></td>
                            <td class="align-middle" style="width: 250px"><img src="../../../storage/{{ $page->titlegamen }}" width="160" height="120"></td>
                            <td class="align-middle" style="width: 100px">
                                @if($page->ine == 0)
                                    0
                                @else
                                    {{ $page->ine }}
                                @endif
                            </td>
                            <td class="align-middle" style="width: 100px">{{ $page->creater }}</td>
                            <td class="align-middle" style="width: 100px">{{ $page->tool }}</td>
                            <td class="align-middle" style="width: 100px">{{ $page->janru }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{ $pages->links() }}
            @endif
            </div>
        </div>
@endsection
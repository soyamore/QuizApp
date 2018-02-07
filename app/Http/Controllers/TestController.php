<?php
/**
 *
 *   Author: Anass BOUTAKAOUA
 *   URI: https://github.com/soyamore
 *   Email: anass@itcours.com
 *
 */
namespace App\Http\Controllers;

use App\Answer;
use App\Quiz;
use App\Result;
use App\Test;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::latest()->get();
        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = Test::create($request->all());

        $score = 0;

        $quiz = Quiz::find($request->get('quiz_id'));
        foreach ($quiz->questions as $question)
        {
            if ($request->has($question->id)) {

                $result = Result::create([
                    'quiz_id'     => $request->get('quiz_id'),
                    'user_id'     => $request->get('user_id'),
                    'test_id'     => $test->id,
                    'question_id' => $question->id,
                    'answer_id'   => $request->get($question->id)
                ]);

                $answer = Answer::find($request->get($question->id));

                if ($answer->correct) {
                    $score += 1;
                }
            }
        }

        $test->score = $score;
        $test->save();

        return redirect()->route('tests.result', $test);
    }

    /**
     * Display the specified resource.
     *
     * @param Test $test
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Test $test)
    {
        $quiz = $test->quiz;
        $results = $test->results;

        $examinee = \App\User::find($test->user_id);
        $tests = $examinee->tests()
            ->where('quiz_id', $quiz->id)
            ->latest()
            ->get();

        $q = array_pluck($results->toArray(), 'question_id');
        $a = array_pluck($results->toArray(), 'answer_id');

        $qa = array_combine($q, $a);

        return view('tests.show_old', compact('test', 'quiz', 'results', 'qa', 'examinee', 'tests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Test $test
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Test $test)
    {
        $test->destroy();
    }

    /**
     * Show results summary after submitting test
     *
     * @param Test $test
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result(Test $test)
    {
        return view('tests.result', compact('test'));
    }

    public function examinees()
    {
        $user = auth()->user();

        if ($user->isHeadHunter()) {
            $quizzes = Quiz::with('tests')
                ->where('user_id', $user->id)
                ->lists('id');

            $examinees = User::whereHas('tests',
                function($query) use ($quizzes)
                {
                    $query->whereIn('quiz_id', $quizzes);
                })
                ->get();

        } else if ($user->isCandidat()) {
            $examinees = User::where('id', $user->id)
                ->get();
        } else {
            $examinees = User::has('tests')->get();
        }
        return view('tests.examinees', compact('examinees'));
    }

    public function examineeTests(User $examinee)
    {
        $user = auth()->user();

        if ($user->isHeadHunter()) {
            $quizzes = Quiz::with('tests')
                ->where('user_id', $user->id)
                ->lists('id');

            $tests = $examinee->tests()
                ->whereIn('quiz_id', $quizzes)
                ->latest()
                ->get();
        } else {
            $tests = $examinee->tests()->latest()->get();
        }
        return view('tests.byexaminee', compact('tests', 'examinee'));
    }
}

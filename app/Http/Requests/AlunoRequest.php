<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AlunoRequest extends FormRequest
{
    public function authorize()
    {
        // Aqui você pode controlar quem está autorizado a fazer essa requisição.
        // Retorne `true` para permitir que todos façam essa requisição.
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer',
            'sexo' => 'required|in:M,F',
            'tipo_cadastro' => 'required|in:matricula,rematricula',
            'serie_2025' => 'required|string|max:255',
            'modalidade' => 'required|in:integral,parcial',
            'turno' => 'required|in:manha,tarde',
            'nome_mae' => 'nullable|string|max:255',
            'responsavel_financeiro' => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'possui_deficiencia' => 'required|boolean',
            'diagnosticos' => 'required|array',
            'diagnosticos.*.diagnostico' => 'required|string',
            'diagnosticos.*.epilepsia' => 'required|boolean',
            'diagnosticos.*.deficiencia_intelectual' => 'required|boolean',
            'diagnosticos.*.alergia' => 'required|boolean',
            'diagnosticos.*.outros' => 'nullable|string',
            'diagnosticos.*.atendente_terapeutico' => 'required|boolean',
            'diagnosticos.*.responsavel' => 'nullable|string|max:255',
            'diagnosticos.*.email_responsavel' => 'nullable|email|max:255',
            'diagnosticos.*.telefone_responsavel' => 'nullable|string|max:255',
            'avaliacoes' => 'required|array',
            'avaliacoes.*.categoria' => 'required|string',
            'avaliacoes.*.pergunta' => 'required|string',
            'avaliacoes.*.resposta' => 'required|in:S,AV,N',
            'avaliacoes.*.pontuacao' => 'required|integer|min:1|max:10',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'idade.required' => 'O campo idade é obrigatório.',
            'idade.integer' => 'A idade deve ser um número inteiro.',
            'sexo.required' => 'O campo sexo é obrigatório.',
            'sexo.in' => 'O sexo deve ser "M" (Masculino) ou "F" (Feminino).',
            'tipo_cadastro.required' => 'O campo tipo de cadastro é obrigatório.',
            'tipo_cadastro.in' => 'O tipo de cadastro deve ser "matricula" ou "rematricula".',
            'serie_2025.required' => 'O campo série para 2025 é obrigatório.',
            'modalidade.required' => 'O campo modalidade é obrigatório.',
            'modalidade.in' => 'A modalidade deve ser "integral" ou "parcial".',
            'turno.required' => 'O campo turno é obrigatório.',
            'turno.in' => 'O turno deve ser "manha" ou "tarde".',
            'possui_deficiencia.required' => 'O campo de deficiência é obrigatório.',
            'possui_deficiencia.boolean' => 'O campo de deficiência deve ser verdadeiro (true) ou falso (false).',
            'diagnosticos.required' => 'É necessário incluir pelo menos um diagnóstico.',
            'diagnosticos.*.diagnostico.required' => 'O campo diagnóstico é obrigatório.',
            'diagnosticos.*.epilepsia.required' => 'O campo epilepsia é obrigatório.',
            'diagnosticos.*.deficiencia_intelectual.required' => 'O campo deficiência intelectual é obrigatório.',
            'diagnosticos.*.alergia.required' => 'O campo alergia é obrigatório.',
            'diagnosticos.*.atendente_terapeutico.required' => 'O campo atendente terapêutico é obrigatório.',
            'avaliacoes.required' => 'É necessário incluir pelo menos uma avaliação.',
            'avaliacoes.*.categoria.required' => 'O campo categoria da avaliação é obrigatório.',
            'avaliacoes.*.pergunta.required' => 'O campo pergunta da avaliação é obrigatório.',
            'avaliacoes.*.resposta.required' => 'O campo resposta da avaliação é obrigatório.',
            'avaliacoes.*.resposta.in' => 'A resposta da avaliação deve ser "S" (Sim), "AV" (À verificar) ou "N" (Não).',
            'avaliacoes.*.pontuacao.required' => 'O campo pontuação é obrigatório.',
            'avaliacoes.*.pontuacao.integer' => 'A pontuação deve ser um número inteiro.',
            'avaliacoes.*.pontuacao.min' => 'A pontuação mínima é 1.',
            'avaliacoes.*.pontuacao.max' => 'A pontuação máxima é 10.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Os dados fornecidos são inválidos.',
            'errors' => $validator->errors()
        ], 422));
    }
}

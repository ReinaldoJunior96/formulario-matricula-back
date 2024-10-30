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
            'nome_mae' => 'nullable|string|max:255',
            'responsavel_financeiro' => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'possui_deficiencia' => 'nullable|boolean',
            'diagnosticos.*.diagnostico' => 'nullable|string',
            'diagnosticos.*.epilepsia' => 'nullable|boolean',
            'diagnosticos.*.deficiencia_intelectual' => 'nullable|boolean',
            'diagnosticos.*.alergia' => 'nullable|boolean',
            'diagnosticos.*.outros' => 'nullable|string',
            'diagnosticos.*.responsavel' => 'nullable|string|max:255',
            'diagnosticos.*.email_responsavel' => 'nullable|email|max:255',
            'diagnosticos.*.telefone_responsavel' => 'nullable|string|max:255',
            'avaliacoes.*.pergunta' => 'string',
            'avaliacoes.*.resposta' => 'nullable|in:S,AV,N',
            'avaliacoes.*.pontuacao' => 'integer',
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
            'possui_deficiencia.required' => 'O campo de deficiência é obrigatório.',
            'possui_deficiencia.boolean' => 'O campo de deficiência deve ser verdadeiro (true) ou falso (false).',
            'diagnosticos.required' => 'É necessário incluir pelo menos um diagnóstico.',
            'diagnosticos.*.epilepsia.required' => 'O campo epilepsia é obrigatório.',
            'diagnosticos.*.deficiencia_intelectual.required' => 'O campo deficiência intelectual é obrigatório.',
            'diagnosticos.*.alergia.required' => 'O campo alergia é obrigatório.',
            'avaliacoes.required' => 'É necessário incluir pelo menos uma avaliação.',
            'avaliacoes.*.pergunta.required' => 'O campo pergunta da avaliação é obrigatório.',
            'avaliacoes.*.resposta.required' => 'O campo resposta da avaliação é obrigatório.',
            'avaliacoes.*.resposta.in' => 'A resposta da avaliação deve ser "S" (Sim), "AV" (À verificar) ou "N" (Não).',
            'avaliacoes.*.pontuacao.required' => 'O campo pontuação é obrigatório.',
            'avaliacoes.*.pontuacao.integer' => 'A pontuação deve ser um número inteiro.',
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

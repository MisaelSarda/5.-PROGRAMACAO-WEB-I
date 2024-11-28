-- Criação da tabela de perguntas
CREATE TABLE questions (
    id SERIAL PRIMARY KEY,              -- ID único da pergunta
    question_text TEXT NOT NULL         -- Texto da pergunta
);

-- Criação da tabela de respostas
CREATE TABLE responses (
    id SERIAL PRIMARY KEY,              -- ID único da resposta
    question_id INT NOT NULL,           -- ID da pergunta respondida
    device_id INT NOT NULL,             -- ID do dispositivo que enviou a resposta
    response_value INT CHECK (response_value BETWEEN 0 AND 10),  -- Valor da resposta (de 0 a 10)
    feedback TEXT,                      -- Feedback adicional opcional
    data_resposta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data e hora da resposta
    CONSTRAINT responses_question_id_fkey FOREIGN KEY (question_id)
        REFERENCES questions(id)
        ON DELETE CASCADE               -- Excluir respostas ao excluir a pergunta
);

-- Criação da tabela de avaliações gerais (feedbacks por setor)
CREATE TABLE avaliacoes (
    id SERIAL PRIMARY KEY,              -- ID único da avaliação
    setor_id INT NOT NULL,              -- ID do setor avaliado
    dispositivo_id INT NOT NULL,        -- ID do dispositivo que enviou o feedback
    feedback TEXT,                      -- Feedback adicional
    data_resposta TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Data e hora do feedback
);

select * from questions


-- Inserção de perguntas na tabela `questions`
INSERT INTO questions (question_text) VALUES
('Quão satisfeito você está com nosso atendimento?'),
('Como você avalia o atendimento da nossa equipe de enfermagem?'),
('Como você avalia o atendimento da nossa equipe médica?');
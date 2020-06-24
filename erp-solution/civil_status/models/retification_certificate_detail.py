# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class RetificationCertificateDetail(models.Model):
    _name = 'retification.certificate.detail'
    _description = 'Retification Certification Detail Model'
    retification_certificate_id       = fields.Many2one('retification.certificate', string="Retification Certificate Info")   
    declarer_id                       = fields.Many2one('citizen', string="Declarer's Full Name")
    rectification_person_id           = fields.Many2one('citizen', string="Rectification Person Name")   
    guardian_certificate_id           = fields.Many2one('guardian.certificate', string="Guardian Certificate Info")   
    terminate_guardian_certificate_id = fields.Many2one('terminate.guardian.certificate', string="Terminate Guardian Certificate Info")   
    death_certificate_id              = fields.Many2one('death.certificate', string="Death Certificate Info")   
    birth_certificate_id              = fields.Many2one('birth.certificate', string="Birth Certificate Info")   
    adoption_certificate_id           = fields.Many2one('adoption.certificate', string="Adoption Certificate Info")   
    marriage_certificate_id           = fields.Many2one('marriage.certificate', string="Marriage Certificate Info")   
    issue_date                        = fields.Date('Issue Day')
    issue_by                          = fields.Char('Issue By')
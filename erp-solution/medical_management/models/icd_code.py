from odoo import fields, api, models, _
class ICDCode(models.Model):
    _name = 'medical.icd.code'
    _description = 'Hospital ICD Code model'
    icd_code = fields.Char('ICD Code')
    disease = fields.Char('Disease Name')
    description = fields.Char()
    prevalence = fields.Float()
    probability_treated = fields.Float()
    version = fields.Integer()
class ICDSubsidiary(models.Model):
    _name = 'medical.icd.subsidiary'
    _description = 'Hospital ICD Subsidiary model'
    icd_code = fields.Char('ICD Subsidiary')
    disease = fields.Char('Disease Name')
    description = fields.Char()
    prevalence = fields.Float()
    probability_treated = fields.Float()
    version = fields.Integer()